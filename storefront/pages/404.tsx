import { DynamicIcon } from "@/modules/common/components";

const Custom404 = () => {
    return (
        <div className="flex items-center justify-center h-screen">
            <div>
                <DynamicIcon iconName="not-found" iconColor={'primary'} iconBackground={false} iconSize={150} />
                <span className="text-4xl text-center font-bold">404 Not Found</span>
            </div>
        </div>
    );
}

export default Custom404;