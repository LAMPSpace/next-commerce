import { DynamicIcon } from "@/modules/common/components";

const Custom404 = () => {
    return (
        <div className="flex items-center justify-center page">
            <div>
                <DynamicIcon iconName="not-found" iconColor={'primary'} iconBackground={false} iconSize={150} />
                <span className="text-4xl text-center font-bold">Page Not Found</span>
            </div>
        </div>
    );
}

export default Custom404;